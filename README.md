# CyberTrust

## Component Versions
```
Docker: 20.10.5
Docker Compose: 1.25.0
```
## How to Launch the Site and Database

First, you need to download all the files by running this :
```
git clone https://github.com/Tiranisu/Wargame-MaeMar-G2.git
```

To launch the website along with the database, simply run the following commands:

```
cd Wargame-MaeMar-G2
docker-compose up --build
```
To stop the services, use:
```
docker-compose down
```

## About the Company

CyberTrust is a forward-thinking e-commerce platform that provides cutting-edge cybersecurity solutions tailored to meet the needs of both individuals and businesses. Our product offerings include essential tools such as password managers, which help users secure their digital credentials, and firewalls, designed to safeguard networks from potential threats.

Currently, our development team is hard at work creating a new and improved interface for our main website. This update aims to enhance user experience and streamline navigation. However, due to a configuration oversight, the new interfaces have been unintentionally made accessible to the public. Alarmingly, these interfaces are connected to the company’s primary database, which could pose a potential security risk.

## Website Overview
### Landing Page

The first page you will encounter when visiting our website is the Landing Page, accessible at:
http://localhost:8080/php/user/index.php.

This page showcases our entire product catalog, complete with detailed names and descriptions for each item. To make your browsing experience more intuitive, every product card includes a button labeled "View Images." Clicking this button will redirect you to a dedicated page displaying images of the selected product at:
http://localhost:8080/php/user/image.php.

In the top-right corner of the page, you will find two essential buttons:

- Login: For users with existing accounts to access their profiles.
- Register: For new users to create an account.

### Login Page

If you already have an account, you can log in by navigating to the Login Page:
http://localhost:8080/php/user/login.php.

Here, you will be prompted to enter your credentials (username and password) to securely access your account. 

Here, you can log in using your credentials.

### Register Page

For users who do not yet have an account, the Register Page is available at:
http://localhost:8080/php/user/register.php.

The registration process is simple and requires only two inputs:

- A username of your choice.
- A password for account security.

Once registered, you will immediately be able to log in and explore your profile.

### Profile Page

After logging in, you will gain access to your personalized Profile Page, located at:
http://localhost:8080/php/user/profile.php.

This page serves as your central hub for account management. It displays your user information and includes a dedicated button to check your account status. This functionality helps users stay updated with their account's role on the platform.
