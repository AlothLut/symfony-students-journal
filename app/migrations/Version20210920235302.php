<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920235302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE students_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE course (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE students (id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, gender VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE students_course (students_id INT NOT NULL, course_id INT NOT NULL, PRIMARY KEY(students_id, course_id))');
        $this->addSql('CREATE INDEX IDX_AC424ADB1AD8D010 ON students_course (students_id)');
        $this->addSql('CREATE INDEX IDX_AC424ADB591CC992 ON students_course (course_id)');
        $this->addSql('ALTER TABLE students_course ADD CONSTRAINT FK_AC424ADB1AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE students_course ADD CONSTRAINT FK_AC424ADB591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE students_course DROP CONSTRAINT FK_AC424ADB591CC992');
        $this->addSql('ALTER TABLE students_course DROP CONSTRAINT FK_AC424ADB1AD8D010');
        $this->addSql('DROP SEQUENCE course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE students_id_seq CASCADE');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE students_course');
    }
}
