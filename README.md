#  **Description of the pizzeria website**

##  **General description**

This website is an online pizzeria store where users can:
- Browse the pizza assortment
- Register and authenticate in the system
- Add products to the cart
- Place an order

---

##  **Main functionalities**

### 1. **Authentication system**
- **Registration**: Users can register by specifying:
- First and last name
- Email
- Phone number
- Username and password
- **Login**: Registered users can log in to the site using their username and password
- **Logout**: Users can log out of their account

### 2. **Homepage**
- Displays general information about the pizzeria
- Contains a navigation menu to navigate to other sections
- Shows a photo of the pizza as logo

### 3. **Product page**
- Displays the pizza catalog in the form of cards
- Each card contains:
- Photo of pizza
- Name
- Description (characteristics)
- Price (including discount, if any)
- "Add to cart" button (for authorized users)
- Pagination (dividing into pages) is implemented

### 4. **Cart page**
- Available only to authorized users
- Displays all products added to the cart
- For each product you can:
- Specify quantity
- Remove from cart
- Proceed to checkout
- Displays prices including discounts

---

##  **Technical implementation**

### **Architecture**
- **MVC** (Model-View-Controller) template is used
- The main functionality is implemented in **PHP**
- **Bootstrap is used for styling 5** and custom **CSS-styles**
- Database - **MySQL** (via PDO)

### **Main classes**
- **Controllers**:
- `UserController` - processing registration, authorization, logout
- `ProductsController` - working with products
- `BasketController` - managing the cart
- `SiteController` - main page

- **Models**:
- `Users` - working with users
- `Products` - working with products
- `Basket` ​​- working with the cart

- **System core**:
- `Router` - routing requests
- `DB` - working with the database
- `Template` - rendering templates
- `Session` - working with sessions
- `Config` - working with file and does with file path variable
- `Controller` - main class controllers
- `Core` - core
- `Model` - main class models
- `RequestMethod` - work with requestMethod


---

##  **License**
**MIT** (LICENSE)
Website with license text: [MIT] (https://opensource.org/license/MIT)
**GNU General Public License v3.0** (LICENSE)
Website with license text: [GPLv3](https://www.gnu.org/licenses/gpl-3.0.html#license-text).
## Third-party technology licenses
**WAMP Server**
**Apache HTTP Server** (LICENSE)
Website with license text: [Apache License 2.0](https://www.apache.org/licenses/)
**GNU General Public License v2.0 (MySQL)**. (LICENSE)
Website with license text: [GNU GPLv2](https://www.mysql.com/about/legal/licensing/)
**PHP License 3.01** (LICENSE)
Website with license text: [PHP License 3.01](https://www.php.net/license/)
**phpMyAdmin** (LICENSE)
Website with license text: [GNU GPLv2](https://www.phpmyadmin.net/license/)
---

##  **Author**
Developer: **DENYS KOZACHOK**
GitHub: **[github.com/yourusername](https://github.com/DenysKozachokP/Pizza_shop)**
Email: **ipz224_kdp@student.ztu.edu.ua**

---
##  **Website screenshots**

![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/photo_1.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/photo_2.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/photo_3.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/photo_4.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/photo_5.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/photo_6.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/photo_7.jpg)

## **Comand for view documentation**

example documentation
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/doc1.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/doc2.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/doc3.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/doc4.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/doc5.jpg)

start docs\html\index.html

## **Swagger documentation**

API Documentation for Pizza Shop
1. Introduction
This document describes the REST API for the Pizza Shop online store, which provides the following capabilities:

Viewing the fishing product catalog

Working with the shopping cart

The API uses the OpenAPI 3.0 standard and is accessible via the Swagger UI.

2. Base URL

http://pizzashop/

3. Authentication
To use the API, you must:

Register via /user/register

Log in via /user/login

Use the received session for authenticated requests

4. Available endpoints
4.1. Getting a list of products
URL: /api/products
Method: GET
Description: Returns a list of all products in the store
Example query:

GET /api/products HTTP/1.1
Host: virtualhost.local

![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/postscrin1.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/postscrin2.jpg)


4.2. Додавання товару до кошика
URL: /api/basket
Метод: POST
Опис: Додає товар до кошика користувача
Заголовки:

Content-Type: application/json

![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/getscrin1.jpg)
![Image alt](https://github.com/DenysKozachokP/Pizza_shop/blob/main/img/Scrinshots/getscrin2.jpg)

##  **Conclusion**
This pizzeria website provides basic online store functionality with the ability to view products, register users, and place orders through a cart. The system has a clear structure and can be expanded with additional functionality.