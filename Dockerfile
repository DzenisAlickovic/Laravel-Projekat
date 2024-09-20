# Dockerfile
# Use base image for container
FROM richarvey/nginx-php-fpm:3.1.6

# Add labels (best practices)
LABEL Name="your-project-name"
LABEL Version="1.0.0"

# Copy all application code into your Docker container
COPY . .

# Update package list
RUN apk update

# Install OpenSSL to resolve libssl.so.10 dependency
RUN apk add --no-cache openssl

# Install the `npm` package
RUN apk add --no-cache npm

# Install NPM dependencies
RUN npm install

# Build Vite assets
RUN npm run build

# Expose the necessary port
EXPOSE 80

CMD ["/start.sh"]
