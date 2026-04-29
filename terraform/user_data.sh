#!/bin/bash

# 1. Actualización e instalación de paquetes
apt update -y
# Añade libapache2-mod-php para asegurar la integración
apt install -y apache2 git php libapache2-mod-php php-mysqli php-curl php-zip php-xml php-mbstring

# 2. Configuración de Apache
# Habilitamos el módulo de reescritura que mencionaste antes
a2enmod rewrite

# 3. Limpieza y Clonación
rm -rf /var/www/html/*
# Clonamos el contenido directamente en la raíz web
git clone https://github.com/adrianosantanadelacruz/TiendaInterstellar.git /tmp/repo
cp -r /tmp/repo/* /var/www/html/
rm -rf /tmp/repo

# 4. Ajuste de configuración de Apache para permitir .htaccess
# Esto es VITAL para que mod_rewrite funcione
sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# 5. Permisos correctos
chown -R www-data:www-data /var/www/html
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;

# 6. Arranque y reinicio
systemctl enable apache2
systemctl restart apache2