UpcycleCart - Municipal Recycling & Reward System
UpcycleCart is a web-based platform designed to bridge the gap in local-level waste management. By connecting Residents, Item Collectors, and Administrators, the system transforms recycling into an engaging, community-driven activity. The core innovation is its coin-based reward system, where users earn virtual currency for their waste, which can be redeemed for sustainable products in an integrated Eco-Store.

Technologies Used
Backend: PHP

Database: MySQL

Frontend: HTML5, CSS3, JavaScript, Bootstrap

Version Control: Git & GitHub

Key Features
1. Admin Module (The Controller)
Ward & Category Management: Organize the municipality into wards and define recyclable categories (Plastic, E-waste, Paper).

Collector Assignment: Assign registered item collectors to specific resident pickup requests.

Eco-Store Oversight: Manage the inventory of upcycled products and set "Coin Values" for specific recyclable sub-items.

Analytics: Track the volume of recycled materials and overall system participation.

2. Customer / Resident Module
Donation Requests: Schedule pickups for items (e.g., plastic bottles, clothes) with a few clicks.

Virtual Wallet: View coins earned from successful recycling collections.

Integrated Shopping: Use earned coins or direct payment to purchase eco-friendly products.

Status Tracking: Monitor the real-time status of pickup requests and order deliveries.

3. Item Collector Module
Pickup Dashboard: View and manage assigned tasks within their specific wards.

On-site Verification: Confirm the item types during collection to trigger the coin reward for the customer.

Status Updates: Update task status to "Collected" or "Rescheduled" to keep the system synchronized.

How to Run this Project
1. Clone the Repository
Bash

git clone https://github.com/sandra7145dev-cloud/UpcycleCart.git
cd UpcycleCart
2. Local Server Setup
Move the project folder to your local server directory:

XAMPP: C:\xampp\htdocs\UpcycleCart

WAMP: C:\wamp64\www\UpcycleCart

Start Apache and MySQL from your XAMPP/WAMP Control Panel.

3. Database Configuration
Open phpMyAdmin in your browser: http://localhost/phpmyadmin/.

Create a new database named db_upcyclecart.

Select the database and click the Import tab.

Upload the database.sql file provided in the repository root.

Open config.php (or your connection file) and update the credentials:

PHP

$conn = mysqli_connect("localhost", "root", "", "db_upcyclecart");
4. Launch the Application
Open your browser and navigate to: http://localhost/UpcycleCart/

Project Credits
Developed as a collaborative project by:

Sandra Sukumaran

Triston K Issac