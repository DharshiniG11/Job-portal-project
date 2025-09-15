CREATE DATABASE IF NOT EXISTS quickjobs;
USE quickjobs;

CREATE TABLE IF NOT EXISTS jobs (
  job_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  company VARCHAR(100) NOT NULL,
  location VARCHAR(100),
  salary VARCHAR(50),
  skills TEXT,
  type VARCHAR(50)
);

INSERT INTO jobs (title,company,location,salary,skills,type) VALUES
('Data Analyst','PixelSoft','Dubai','₹35,000 - ₹45,000','SQL, Excel, PowerBI','Full-time'),
('Frontend Developer','BlueWave','Bengaluru','₹30,000 - ₹50,000','HTML, CSS, JavaScript, React','Contract'),
('ML Intern','CloudNine','Remote','Stipend','Python, Pandas, Scikit-learn','Internship');

CREATE TABLE IF NOT EXISTS applications (
  app_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  role_applied VARCHAR(100),
  experience INT,
  skills TEXT,
  resume_path VARCHAR(255),
  cover_note TEXT,
  applied_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);