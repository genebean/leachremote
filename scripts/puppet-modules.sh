modulepath='/vagrant/puppet/modules'

rm -rf ${modulepath}/*

puppet module install puppetlabs-apache --version 1.0.1 --modulepath ${modulepath}
