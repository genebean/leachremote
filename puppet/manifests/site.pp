# Setup a web server for leachremote

node 'leachremote' {
  class { 'apache':
    default_mods  => false,
    default_vhost => false,
  }

  apache::vhost { $::fqdn:
    port          => '80',
    docroot       => '/var/www/www-files',
    require       => File['/var/www/www-files'],
  }

  file { '/var/www':
    ensure        => link,
    target        => '/vagrant',
    force         => true,
  }

  file { '/var/www/www-files':
    ensure        => directory,
    require       => File['/var/www'],
  }
}
