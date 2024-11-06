-- Create Database
CREATE DATABASE IF NOT EXISTS safaripoultry;
USE safaripoultry;

-- 1. Customers Table: Stores customer information for tracking sales
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone_number VARCHAR(20),
    address TEXT,
    registration_date DATE DEFAULT CURRENT_DATE
);

-- 2. Birds Table: Stores information on different types of birds being sold
CREATE TABLE birds (
    bird_id INT AUTO_INCREMENT PRIMARY KEY,
    bird_type VARCHAR(100) NOT NULL,  -- e.g., 'Broiler', 'Layer', 'Turkey'
    age_in_weeks INT NOT NULL,  -- Age of the birds in weeks
    weight DECIMAL(5, 2) NOT NULL,  -- Average weight per bird in kilograms
    price_per_kg DECIMAL(10, 2) NOT NULL,  -- Price per kilogram
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Sales Table: Logs sales records for each transaction
CREATE TABLE sales (
    sale_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    bird_id INT,
    sale_date DATE DEFAULT CURRENT_DATE,
    quantity INT NOT NULL,  -- Quantity sold
    unit_price DECIMAL(10, 2) NOT NULL,  -- Price per kilogram at the time of sale
    total_weight DECIMAL(10, 2) NOT NULL,  -- Total weight of birds sold
    total_amount DECIMAL(10, 2) AS (total_weight * unit_price) STORED,  -- Calculated total
    payment_method VARCHAR(50),  -- e.g., 'Cash', 'Card', 'Bank Transfer'
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (bird_id) REFERENCES birds(bird_id)
);

-- 4. Inventory Table: Manages current stock levels for each bird type
CREATE TABLE inventory (
    inventory_id INT AUTO_INCREMENT PRIMARY KEY,
    bird_id INT,
    initial_stock INT NOT NULL,  -- Initial stock quantity of birds
    current_stock INT NOT NULL,  -- Current stock quantity of birds
    restock_level INT,  -- Alert level for restocking
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (bird_id) REFERENCES birds(bird_id)
);

-- 5. Expenses Table: Records expenses related to each bird type
CREATE TABLE expenses (
    expense_id INT AUTO_INCREMENT PRIMARY KEY,
    bird_id INT,
    expense_date DATE DEFAULT CURRENT_DATE,
    description VARCHAR(255),
    amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (bird_id) REFERENCES birds(bird_id)
);

-- 6. Sales Performance View: A view for chart analysis of total sales, quantity sold, and average price
CREATE VIEW sales_performance AS
SELECT 
    birds.bird_type,
    MONTH(sale_date) AS sale_month,
    YEAR(sale_date) AS sale_year,
    SUM(quantity) AS total_quantity_sold,
    SUM(total_weight) AS total_weight_sold,
    SUM(total_amount) AS total_sales,
    AVG(unit_price) AS average_price_per_kg
FROM sales
JOIN birds ON sales.bird_id = birds.bird_id
GROUP BY birds.bird_id, sale_year, sale_month;

-- 7. Profit and Loss View: Aggregated profit and cost data for each bird type by month and year
CREATE VIEW profit_and_loss AS
SELECT 
    birds.bird_type,
    MONTH(expense_date) AS expense_month,
    YEAR(expense_date) AS expense_year,
    SUM(expenses.amount) AS total_expenses,
    (SUM(sales.total_amount) - SUM(expenses.amount)) AS net_profit
FROM birds
LEFT JOIN sales ON birds.bird_id = sales.bird_id
LEFT JOIN expenses ON birds.bird_id = expenses.bird_id
GROUP BY birds.bird_id, expense_year, expense_month;

-- Indexes for Performance Optimization
CREATE INDEX idx_sales_date ON sales (sale_date);
CREATE INDEX idx_inventory_stock ON inventory (current_stock);
CREATE INDEX idx_expenses_date ON expenses (expense_date);
CREATE INDEX idx_bird_type ON birds (bird_type);

-- Sample Data for Testing

-- Insert sample customers
INSERT INTO customers (customer_name, email, phone_number, address) VALUES
('John Doe', 'john.doe@example.com', '555-1234', '101 Bird St'),
('Jane Smith', 'jane.smith@example.com', '555-5678', '202 Farm Rd'),
('Tom Wilson', 'tom.wilson@example.com', '555-9012', '303 Poultry Ln');

-- Insert sample bird types
INSERT INTO birds (bird_type, age_in_weeks, weight, price_per_kg) VALUES
('Broiler', 6, 2.0, 5.00),
('Layer', 20, 1.5, 4.00),
('Turkey', 12, 4.0, 10.00);

-- Insert sample inventory
INSERT INTO inventory (bird_id, initial_stock, current_stock, restock_level) VALUES
(1, 500, 500, 100),  -- Broiler
(2, 300, 300, 50),  -- Layer
(3, 100, 100, 20);  -- Turkey

-- Insert sample sales
INSERT INTO sales (customer_id, bird_id, sale_date, quantity, unit_price, total_weight, payment_method) VALUES
(1, 1, '2024-11-01', 50, 5.00, 100.0, 'Cash'),
(2, 2, '2024-11-02', 30, 4.00, 45.0, 'Card'),
(3, 3, '2024-11-03', 10, 10.00, 40.0, 'Bank Transfer'),
(1, 1, '2024-11-04', 20, 5.00, 40.0, 'Cash');

-- Insert sample expenses
INSERT INTO expenses (bird_id, expense_date, description, amount) VALUES
(1, '2024-10-15', 'Feed for broilers', 200.00),
(2, '2024-10-18', 'Vaccinations for layers', 150.00),
(3, '2024-10-20', 'Housing maintenance', 75.00),
(1, '2024-10-25', 'Electricity for heating', 50.00);

-- End of SQL Dump
