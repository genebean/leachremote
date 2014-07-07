# Setup a web server for leachremote

node 'leachremote' {
  class { 'apache':
    default_mods   => false,
    default_vhost  => false,
  }

  apache::mod::dir
  apache::mod::mpm_module
  apache::mod::php

  apache::vhost { $::fqdn:
    directoryindex => ['index.html'],
    docroot        => '/var/www/www-files',
    port           => '80',
    priority       => '00',

    require        => File['/var/www/www-files'],
  }

  file { '/var/www/www-files':
    ensure         => link,
    target         => '/vagrant/www-files',
  }

  $utility_packages = [ 'multitail', 'vim-enhanced' ]
  package { $utility_packages:
    ensure         => installed,
  }
}
