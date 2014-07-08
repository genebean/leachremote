# LeachRemote

LeachRemote is a mobile-friendly web application that sends commands to an
Arduino-based TV remote running WebRemote.

## Version

0.2 - Added PHP support to Vagrant  
0.1 - Design phase  

## Usage

The first time you pull the application up on a device you will need to scroll
to the bottom and enter some information about your device running WebRemote.
This information will be saved in a cookie, so that you don't have to enter it
every time.

## Installing on webserver

```sh
git clone https://github.com/genebean/leachremote.git leachremote
cd leachremote
ln -s www-files /path/to/document-root
```

## Installing for development / testing

To fully use the development environment you will need to have [Vagrant] and [Git]
installed. The first time you run `vagrant up` it will take a few minutes to download
the [box] (virtual machine template). This is a one-time thing. The box specified in 
the Vagrantfile supports [Virtualbox], [VMware Workstation], and [VMware Fusion].

```sh
git clone https://github.com/genebean/leachremote.git leachremote  
cd leachremote  
vagrant up  
```

## Tech

LeachRemote takes advantage of several other open source projects:

* [Bootstrap] - great UI boilerplate for modern web apps
* [Slate] - a gunmetal gray theme based on Bootstrap
* [jQuery] - awesome JavaScript without any hand-coding
* [jquery.cookie] - a jQuery plugin for reading, writing and deleting cookies
* [Git] - version control, GitHub's lifeblood, how the Linux kernel is managed
* [Vagrant] - lightweith, reproducible, and portable development environments
* [Puppet] - automated configuration managment. LeachRemote uses this inside Vagrant.
* [Virtualbox] - free way to run vm's like those used as part of Vagrant

License
----

BSD 3-clause (see LICENSE in the repository's root)

[Bootstrap]:http://twitter.github.com/bootstrap/
[Slate]:http://bootswatch.com/slate/
[jQuery]:http://jquery.com
[jquery.cookie]:https://github.com/carhartl/jquery-cookie
[Git]:http://git-scm.com/
[Vagrant]:http://www.vagrantup.com/
[Puppet]:http://docs.puppetlabs.com/guides/install_puppet/pre_install.html
[Virtualbox]:https://www.virtualbox.org/wiki/Downloads
[VMware Workstation]:http://www.vmware.com/products/workstation/
[VMware Fusion]:http://www.vmware.com/products/fusion/
[box]:https://vagrantcloud.com/genebean/centos6-64bit

