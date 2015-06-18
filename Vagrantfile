# -*- mode: ruby -*-
# vi: set ft=ruby :

$script = <<SCRIPT
  if [ ! -f /vagrant/.provisioned ]; then
    apt-get update
    apt-get install -y git-core vim curl apache2 php5-cli php5-curl libapache2-mod-php5
    cat > /etc/apache2/sites-available/xing-api-sample <<EOF
<VirtualHost *:80>
  DocumentRoot /vagrant
  <Directory /vagrant>
    Options FollowSymLinks
    AllowOverride All
  </Directory>

  ErrorLog /var/log/apache2/error.log

  LogLevel warn

  CustomLog /var/log/apache2/access.log combined

</VirtualHost>
EOF
    a2dissite default
    a2ensite xing-api-sample
    a2enmod rewrite
    apache2ctl restart
    cd /vagrant
    su -c 'curl -sS https://getcomposer.org/installer | php' vagrant
    su -c 'php composer.phar install'
    touch /vagrant/.provisioned
  fi
SCRIPT

Vagrant.configure("2") do |config|
  config.vm.box     = "base"
  config.vm.box_url = "http://files.vagrantup.com/lucid64.box"

  config.vm.network :forwarded_port, guest: 80, host: 8080

  config.vm.provider :virtualbox do |vb|
     vb.gui = false
     vb.customize ["modifyvm", :id, "--memory", "512"]
  end

  config.vm.provision "shell", inline: $script
end
