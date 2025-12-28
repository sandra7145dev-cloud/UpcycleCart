# UpcycleCart - Municipal Recycling & Reward System

**UpcycleCart** is a web-based platform designed to bridge the gap in local-level waste management. By connecting Residents, Item Collectors, and Administrators, the system transforms recycling into an engaging, community-driven activity. The core innovation is its **coin-based reward system**, where users earn virtual currency for their waste, which can be redeemed for sustainable products in an integrated **Eco-Store**.

---

## Technologies Used
* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap
* **Version Control:** Git & GitHub

---

##  Key Features

### 1. Admin Module (The Controller)
* **Ward & Category Management:** Organize the municipality into wards and define recyclable categories (Plastic, E-waste, Paper).
* **Collector Assignment:** Assign registered item collectors to specific resident pickup requests.
* **Eco-Store Oversight:** Manage the inventory of upcycled products and set "Coin Values" for specific recyclable sub-items.

### 2. Customer / Resident Module
* **Donation Requests:** Schedule pickups for items with a few clicks.
* **Virtual Wallet:** View coins earned from successful recycling collections.
* **Integrated Shopping:** Use earned coins or direct payment to purchase eco-friendly products.

### 3. Item Collector Module
* **Pickup Dashboard:** View and manage assigned tasks within their specific wards.
* **On-site Verification:** Confirm item types to trigger rewards.
* **Status Updates:** Update task status to "Collected" or "Rescheduled."

---

##  How to Run this Project

### 1. Clone the Repository
```bash
git clone [https://github.com/sandra7145dev-cloud/UpcycleCart.git](https://github.com/sandra7145dev-cloud/UpcycleCart.git)
cd UpcycleCart

### 2. Local Server Setup
Move the project folder to your local server directory:

XAMPP: C:\xampp\htdocs\UpcycleCart

WAMP: C:\wamp64\www\UpcycleCart

Start Apache and MySQL from your Control Panel.

### 3. Database Configuration
Open phpMyAdmin: http://localhost/phpmyadmin/.

Create a new database named db_upcyclecart.

Select the database, click the Import tab, and upload the database.sql file.

Open your connection file (e.g., config.php) and update the credentials:
$conn = mysqli_connect("localhost", "root", "", "db_upcyclecart");

##Project Credits
Developed as a collaborative project by:
Sandra Sukumaran
Triston K Issac