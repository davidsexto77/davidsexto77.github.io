#!/usr/bin/env bash
set -e

: "${APP_SUBDIR:=PHP}"

APP_SUBDIR="${APP_SUBDIR#/}"

if [ -z "$APP_SUBDIR" ] || [ "$APP_SUBDIR" = "." ]; then
  TARGET="/var/www/html"
else
  TARGET="/var/www/html/$APP_SUBDIR"
fi

if [ ! -d "$TARGET" ]; then
  echo "WARNING: '$TARGET' does not exist. Listing /var/www/html:"
  ls -la /var/www/html || true
else
  echo "Setting Apache DocumentRoot to: $TARGET"

  sed -i "s#DocumentRoot /var/www/html#DocumentRoot ${TARGET}#g" /etc/apache2/sites-available/000-default.conf

  if ! grep -q "<Directory ${TARGET}>" /etc/apache2/apache2.conf; then
    cat <<EOF >> /etc/apache2/apache2.conf

<Directory ${TARGET}>
    AllowOverride All
    Require all granted
</Directory>
EOF
  fi
fi

chown -R www-data:www-data /var/www/html || true
find /var/www/html -type d -exec chmod 755 {} \; || true
find /var/www/html -type f -exec chmod 644 {} \; || true

if [ -f /usr/local/bin/docker-php-entrypoint ]; then
  /usr/local/bin/docker-php-entrypoint "$@"
fi

exec "$@"
