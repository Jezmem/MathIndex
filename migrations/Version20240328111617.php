<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328111617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercise CHANGE id id VARCHAR(255) NOT NULL, CHANGE exercise_file_id exercise_file_id INT NOT NULL, CHANGE duration duration DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C2395FCED FOREIGN KEY (thematic_id) REFERENCES thematic (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C6278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C56A273CC FOREIGN KEY (origin_id) REFERENCES origin (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51CB03A8386 FOREIGN KEY (created_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C49DE8E29 FOREIGN KEY (exercise_file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51CA85344B2 FOREIGN KEY (correction_file_id) REFERENCES thematic (id)');
        $this->addSql('CREATE INDEX IDX_AEDAD51C2395FCED ON exercise (thematic_id)');
        $this->addSql('CREATE INDEX IDX_AEDAD51C6278D5A8 ON exercise (classroom_id)');
        $this->addSql('CREATE INDEX IDX_AEDAD51C591CC992 ON exercise (course_id)');
        $this->addSql('CREATE INDEX IDX_AEDAD51C56A273CC ON exercise (origin_id)');
        $this->addSql('CREATE INDEX IDX_AEDAD51CB03A8386 ON exercise (created_by_id)');
        $this->addSql('CREATE INDEX IDX_AEDAD51C49DE8E29 ON exercise (exercise_file_id)');
        $this->addSql('CREATE INDEX IDX_AEDAD51CA85344B2 ON exercise (correction_file_id)');
        $this->addSql('ALTER TABLE exercise_skill ADD exercise_id VARCHAR(255) NOT NULL, ADD skill_id INT NOT NULL, DROP exercise_id, DROP skill_id');
        $this->addSql('ALTER TABLE exercise_skill ADD CONSTRAINT FK_7B0B13B55A726995 FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('ALTER TABLE exercise_skill ADD CONSTRAINT FK_7B0B13B55A6C0D6B FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('CREATE INDEX IDX_7B0B13B55A726995 ON exercise_skill (exercise_id)');
        $this->addSql('CREATE INDEX IDX_7B0B13B55A6C0D6B ON exercise_skill (skill_id)');
        $this->addSql('ALTER TABLE skill CHANGE course_id course_id INT NOT NULL');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47796EF99BF FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_5E3DE47796EF99BF ON skill (course_id)');
        $this->addSql('ALTER TABLE thematic CHANGE course_id course_id INT NOT NULL');
        $this->addSql('ALTER TABLE thematic ADD CONSTRAINT FK_7C1CDF7296EF99BF FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_7C1CDF7296EF99BF ON thematic (course_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C2395FCED');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C6278D5A8');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C591CC992');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C56A273CC');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51CB03A8386');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C49DE8E29');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51CA85344B2');
        $this->addSql('DROP INDEX IDX_AEDAD51C2395FCED ON exercise');
        $this->addSql('DROP INDEX IDX_AEDAD51C6278D5A8 ON exercise');
        $this->addSql('DROP INDEX IDX_AEDAD51C591CC992 ON exercise');
        $this->addSql('DROP INDEX IDX_AEDAD51C56A273CC ON exercise');
        $this->addSql('DROP INDEX IDX_AEDAD51CB03A8386 ON exercise');
        $this->addSql('DROP INDEX IDX_AEDAD51C49DE8E29 ON exercise');
        $this->addSql('DROP INDEX IDX_AEDAD51CA85344B2 ON exercise');
        $this->addSql('ALTER TABLE exercise CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE duration duration DOUBLE PRECISION NOT NULL, CHANGE exercise_file_id exercise_file_id INT NOT NULL');
        $this->addSql('ALTER TABLE exercise_skill DROP FOREIGN KEY FK_7B0B13B55A726995');
        $this->addSql('ALTER TABLE exercise_skill DROP FOREIGN KEY FK_7B0B13B55A6C0D6B');
        $this->addSql('DROP INDEX IDX_7B0B13B55A726995 ON exercise_skill');
        $this->addSql('DROP INDEX IDX_7B0B13B55A6C0D6B ON exercise_skill');
        $this->addSql('ALTER TABLE exercise_skill ADD skill_id INT NOT NULL, DROP exercise_id, CHANGE skill_id exercise_id INT NOT NULL');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47796EF99BF');
        $this->addSql('DROP INDEX IDX_5E3DE47796EF99BF ON skill');
        $this->addSql('ALTER TABLE skill CHANGE course_id course_id INT NOT NULL');
        $this->addSql('ALTER TABLE thematic DROP FOREIGN KEY FK_7C1CDF7296EF99BF');
        $this->addSql('DROP INDEX IDX_7C1CDF7296EF99BF ON thematic');
        $this->addSql('ALTER TABLE thematic CHANGE course_id course_id INT NOT NULL');
    }
}
