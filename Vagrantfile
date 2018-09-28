# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.box = "ubuntu/trusty64"
    config.vm.network "private_network", ip: "192.168.33.33"
    config.vm.hostname = "elucidattest"
    config.vm.synced_folder "", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }
    config.vm.provision :shell, path: "bootstrap.sh"
end

