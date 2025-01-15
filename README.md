# Proposal
# Group Member
1. MUHAMMAD ZARUL HAFIZZUDDIN BIN MOHD ZAIDI (2215331)
2. NURDIYANA SHAHIRAH BINTI AZLAN (2210236)
3. HAZIQ EMIR BIN  MOHSIN (2216379)
4. AZWA NURNISYA BINTI AYUB (2217418)
5. NOR AZREEN BINTI ASARI (2217638)

# MIXUE Ordering System

# Introduction

For the chain brand MIXUE, which is popular for its trendy ice cream and freshly brewed tea drinks, our group proposed a web application ordering system. The application, which will be created with the Laravel framework, attempts to give MIXUE customers a convenient and effective way to place online orders.

The application allows for a seamless interaction between the user interface, business logic, and data management by utilizing Laravel's Model-View-Controller (MVC) architecture. We'll integrate features like secure checkout, real-time order tracking, and easy-to-use navigation. Important Laravel technologies will speed up development and provide a stable and dependable system, such as PHP Artisan CLI for command-line interactions, Blade Templating Engine for dynamic views, and Eloquent ORM for database administration.

The system fills a significant gap in MIXUE's digital strategy by addressing the company's lack of an online ordering platform. In addition to improving customer convenience, this platform will maximize MIXUE's operational effectiveness and increase its sales in the competitive ice cream and beverage industry.


# Objectives

The primary objectives of the MIXUE Ordering System web application are:

- To offer a convenient online ordering experience
- To increase sales and operational efficiency
- To extends MIXUE's Online Visibility
- To improve customers satisfaction and engagement




# Features and Functionalities
Our proposed features and functionalities for this system are as follows:
### 1. User authentication
C: Users register for accounts </br>
R: User view profile </br>
U: Users update account details </br>
D: Admin deletes inactive accounts 
### 2. Menu management
C: Admin adds a new product </br>
R: Customer and admin can view menu items </br>
U: Admin edits product details </br>
D: Admin removes discontinued menu </br>
### 3. Cart 
C: Customers add items to their cart </br>
R: Customers view cart contents </br>
U: Customers update item quantities </br>
D: Customers remove items from the cart
### 4. Transaction
C: Insert new transaction records when an order is placed </br>
R: Admin can view transaction history </br>
U: Admin modify existing transaction status </br>
D: Remove transaction records if necessary 
### 5. Delivery
C: Record new delivery details when an order is scheduled for delivery </br>
R: View delivery details </br>
U: Update delivery status or details </br>
D: Remove delivery records if necessary


# ER Diagram
![food app drawio (1)](https://github.com/user-attachments/assets/9038ca9d-9a92-49ee-8e76-fe1e14c8933e)

# Sequence Diagram
![Alt text](images/Final_SeqDiagram.png)


# Mock Up
### 1. Login page
![Alt text](images/mixue_login.png)
### 2. Register page
![Alt text](images/mixue_register.png)
### 3. Registered Page
![Alt text](images/mixue_register2.png)
### 4. Home page
![Alt text](images/mixuehome.png)
### 5. Menu Page
![Alt text](images/mixuemenu.png)
### 6. Cart Page
![Alt text](images/mixuecart.png)
### 7. Payment Page
![Alt text](images/mixuepayment.png)
### 8. Receipt Page
![Alt text](images/mixuereceipt.png)
### 9. Delivery Page
![Alt text](images/mixuedelivery.png)
### 10. Admin Page
#### a. Add Item
![Alt text](images/ADMIN_DASHBOARD(ADD).png)
#### b. Update Item
![Alt text](images/ADMIN_DASHBOARD(UPDATE).png)
#### c. Delete Item
![Alt text](images/ADMIN_DASHBOARD(DELETE).png)

# References
1. MIXUE Malaysia. (2024). Mixue.com. https://my.mixue.com/
2. Discover the best frozen yogurt | llaollao. (n.d.). Llaollao. https://www.llaollaoweb.com/en/
3. Loob Holding Sdn. Bhd. (2017). Tealive. Tealive.com.my. https://www.tealive.com.my/
‌
# Final Report

# Screen Captured of Project System

### 1. Login Page
#### a. Profile Page
<img width="946" alt="profile page" src="https://github.com/user-attachments/assets/16b14652-0ed1-4347-974b-6608024c2b38" />
These profile page is setup to allow user choose their role or as admin or customer.

#### b. Customer Login
<img width="947" alt="CUSTOMER LOGIN" src="https://github.com/user-attachments/assets/e2ad158f-740f-4121-89b5-00b2b34068a3" />
This page authenticate and validate created user and redirect it to menu page after login confirmed.

#### c. Admin Login
<img width="947" alt="adminlogin" src="https://github.com/user-attachments/assets/7cb04453-9674-42cc-ad33-37a155c1c533" />
Admin Login have different interface to differentiate the login between customer and admin. The login will redirect the admin to admin dashboard after authentication.

### 2. Register Page
#### a. Register 
<img width="946" alt="REGISTER" src="https://github.com/user-attachments/assets/5bc8b525-e7c7-4acb-a2a9-6ccd5845ce05" />
Registration for users. Users need to enter their data and it will be stored in the database. Success registration will redirect the user to success page.

#### b. Success Page
<img width="950" alt="image" src="https://github.com/user-attachments/assets/987e31b2-13e7-4470-8e65-5ab6ae8f18ac" />
Success Page acknowledge the user that their registration has suceed and allows user to continue login or choose between viewing their profile. 

### 3. Menu Page
![Alt text](images/Final_MixueMenu.png)

### 4. Admin Page
#### a. Add Menu
![Alt text](images/Final_AddMenu.png)
#### b. Edit Menu
![Alt text](images/Final_EditMenu.png)
#### c. Delete Menu
![Alt text](images/Final_DeleteMenu.png)
#### d. View Transaction
![Alt text](images/Final_ViewTransaction.png)
#### e. Add Transaction
![Alt text](images/Final_AddTransaction.png)
#### f. Edit Transaction
![Alt text](images/Final_EditTransaction.png)

### 5. Add to Cart Page
![Alt text](images/AddtoCart.png)
### 6. Delivery Page
![Alt text](images/delivery.jpg)

# Challenge and Difficulties to Develop the Application
### 1. First-Time Use of GitHub
As this was our first time using GitHub, we faced challenges in connecting the Laravel project to GitHub. We managed to overcome this by learning from YouTube tutorials and help from our friends.
### 2. Database Relationship Management
We encountered difficulties in connecting relationships between tables in the database due to differences in attribute names, particularly in tables with foreign key constraints. We resolved this by standardizing and aligning the attribute names.
### 3. Fear of Committing and Pushing Changes
We also feel a little bit afraid to COMMIT & PUSH because we were worried it might affect the work of other group members. We managed to solve it by gradually building our confidence and ensuring proper testing and review before pushing changes.
### 4. Unfamiliar with Jetstream and Live-wire Packages
We learnt to do the form automatically but when we tried to edit for authentication it is harder because the files is not made by us. 
While doing the authentication the role could not be setup for admin and customer due to migration problem.

