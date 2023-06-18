TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER sinhron\nAFTER UPDATE\nON subjects FOR EACH ROW\nBEGIN\n    UPDATE Work\n    SET Грамот = (\n        CASE\n            WHEN Work.Предмет = \'Русский\' THEN NEW.russian\n            WHEN Work.Предмет = \'Математика\' THEN NEW.math\n            WHEN Work.Предмет = \'Физика\' THEN NEW.physics\n        END\n    );\nEND'
sql_modes=1098907648
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=1686710651168891
