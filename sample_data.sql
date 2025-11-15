-- Sample data for CakePHP Volunteer Management System
-- Run this after migrations to populate the database

-- Insert skills
INSERT INTO skills (name, description, created, modified) VALUES
('First Aid', 'Basic first aid and emergency response', NOW(), NOW()),
('Event Planning', 'Organizing and coordinating events', NOW(), NOW()),
('Teaching', 'Educational skills for workshops', NOW(), NOW()),
('IT Support', 'Technical support and troubleshooting', NOW(), NOW()),
('Communication', 'Public speaking and communication skills', NOW(), NOW()),
('Leadership', 'Team management and leadership', NOW(), NOW());

-- Insert volunteers
INSERT INTO volunteers (first_name, last_name, phone, email, availability, self_intro, date_submitted, profile_image, created, modified) VALUES
('John', 'Doe', '+1234567890', 'john.doe@example.com', 'Weekends', 'Passionate about community service', '2024-01-15', NULL, NOW(), NOW()),
('Jane', 'Smith', '+1234567891', 'jane.smith@example.com', 'Evenings', 'Experienced in event coordination', '2024-01-20', NULL, NOW(), NOW()),
('Mike', 'Johnson', '+1234567892', 'mike.johnson@example.com', 'Flexible', 'IT professional willing to help', '2024-01-25', NULL, NOW(), NOW()),
('Sarah', 'Williams', '+1234567893', 'sarah.williams@example.com', 'Weekdays', 'Teacher with communication skills', '2024-02-01', NULL, NOW(), NOW()),
('David', 'Brown', '+1234567894', 'david.brown@example.com', 'Weekends', 'First aid certified volunteer', '2024-02-05', NULL, NOW(), NOW());

-- Insert partner organisations
INSERT INTO partner_organisations (business_name, business_address, contact_name, contact_email, contact_phone, industry, help_description, created, modified) VALUES
('Community Center', '123 Main St, City, State', 'Alice Cooper', 'alice@communitycenter.org', '+1234567895', 'Non-profit', 'Need volunteers for community events', NOW(), NOW()),
('Local School', '456 Education Ave, City, State', 'Bob Wilson', 'bob@localschool.edu', '+1234567896', 'Education', 'Assistance with after-school programs', NOW(), NOW()),
('City Hospital', '789 Health Blvd, City, State', 'Carol Davis', 'carol@cityhospital.com', '+1234567897', 'Healthcare', 'Support for patient care activities', NOW(), NOW());

-- Insert events (assuming partner_organisation_id 1,2,3 from above)
INSERT INTO events (title, location, host, event_date, event_size, contact_name, contact_email, description, required_equipment, required_skills, required_crews, status, partner_organisation_id, created, modified) VALUES
('Community Cleanup', 'Central Park', 'Community Center', '2024-03-15', 50, 'Alice Cooper', 'alice@communitycenter.org', 'Monthly park cleanup event', 'Gloves, trash bags', 'Physical labor', 5, 'active', 1, NOW(), NOW()),
('Tech Workshop', 'School Auditorium', 'Local School', '2024-03-20', 30, 'Bob Wilson', 'bob@localschool.edu', 'Introduction to coding for kids', 'Laptops, projectors', 'IT Support, Teaching', 3, 'active', 2, NOW(), NOW()),
('Health Fair', 'Hospital Lobby', 'City Hospital', '2024-03-25', 100, 'Carol Davis', 'carol@cityhospital.com', 'Annual health awareness event', 'Booths, medical supplies', 'First Aid, Communication', 8, 'pending', 3, NOW(), NOW()),
('Youth Mentoring', 'Community Center', 'Community Center', '2024-04-01', 20, 'Alice Cooper', 'alice@communitycenter.org', 'Mentoring program for youth', 'Meeting rooms', 'Leadership, Communication', 4, 'active', 1, NOW(), NOW());

-- Insert volunteers_skills (junction table)
INSERT INTO volunteers_skills (volunteer_id, skill_id) VALUES
(1, 1), -- John - First Aid
(1, 5), -- John - Communication
(2, 2), -- Jane - Event Planning
(2, 6), -- Jane - Leadership
(3, 4), -- Mike - IT Support
(3, 5), -- Mike - Communication
(4, 3), -- Sarah - Teaching
(4, 5), -- Sarah - Communication
(5, 1), -- David - First Aid
(5, 6); -- David - Leadership

-- Insert events_volunteers (junction table)
INSERT INTO events_volunteers (event_id, volunteer_id, status, created, modified) VALUES
(1, 1, 'confirmed', NOW(), NOW()), -- John at Community Cleanup
(1, 5, 'confirmed', NOW(), NOW()), -- David at Community Cleanup
(2, 3, 'confirmed', NOW(), NOW()), -- Mike at Tech Workshop
(2, 4, 'pending', NOW(), NOW()), -- Sarah at Tech Workshop
(3, 1, 'confirmed', NOW(), NOW()), -- John at Health Fair
(3, 5, 'confirmed', NOW(), NOW()), -- David at Health Fair
(4, 2, 'confirmed', NOW(), NOW()), -- Jane at Youth Mentoring
(4, 4, 'pending', NOW(), NOW()); -- Sarah at Youth Mentoring

-- Insert documents (assuming volunteer_id 1-5)
INSERT INTO documents (name, file_path, file_type, file_size, volunteer_id, created, modified) VALUES
('Resume_John_Doe.pdf', '/files/documents/resume_john.pdf', 'pdf', 204800, 1, NOW(), NOW()),
('Certificate_Jane_Smith.pdf', '/files/documents/cert_jane.pdf', 'pdf', 153600, 2, NOW(), NOW()),
('ID_Mike_Johnson.jpg', '/files/documents/id_mike.jpg', 'jpg', 102400, 3, NOW(), NOW()),
('Reference_Sarah_Williams.pdf', '/files/documents/ref_sarah.pdf', 'pdf', 256000, 4, NOW(), NOW()),
('FirstAid_David_Brown.pdf', '/files/documents/firstaid_david.pdf', 'pdf', 307200, 5, NOW(), NOW());
