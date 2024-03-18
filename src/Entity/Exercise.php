<?php

namespace App\Entity;

use App\Repository\ExerciseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseRepository::class)]
class Exercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $course_id = null;

    #[ORM\Column]
    private ?int $classroom_id = null;

    #[ORM\Column]
    private ?int $thematic_id = null;

    #[ORM\Column(length: 255)]
    private ?string $chapter = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $keyword = null;

    #[ORM\Column]
    private ?int $difficulty = null;

    #[ORM\Column]
    private ?float $duratoin = null;

    #[ORM\Column]
    private ?int $origin_id = null;

    #[ORM\Column(length: 255)]
    private ?string $origin_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $origin_information = null;

    #[ORM\Column(length: 255)]
    private ?string $proposed_by_type = null;

    #[ORM\Column(length: 255)]
    private ?string $proposed_by_first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $proposed_by_last_name = null;

    #[ORM\Column]
    private ?int $exercisie_file_id = null;

    #[ORM\Column]
    private ?int $correction_file_id = null;

    #[ORM\Column]
    private ?int $created_by_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCourseId(): ?int
    {
        return $this->course_id;
    }

    public function setCourseId(int $course_id): static
    {
        $this->course_id = $course_id;

        return $this;
    }

    public function getClassroomId(): ?int
    {
        return $this->classroom_id;
    }

    public function setClassroomId(int $classroom_id): static
    {
        $this->classroom_id = $classroom_id;

        return $this;
    }

    public function getThematicId(): ?int
    {
        return $this->thematic_id;
    }

    public function setThematicId(int $thematic_id): static
    {
        $this->thematic_id = $thematic_id;

        return $this;
    }

    public function getChapter(): ?string
    {
        return $this->chapter;
    }

    public function setChapter(string $chapter): static
    {
        $this->chapter = $chapter;

        return $this;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setKeyword(string $keyword): static
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getDuration(): ?float
    {
        return $this->duratoin;
    }

    public function setDuration(float $duratoin): static
    {
        $this->duratoin = $duratoin;

        return $this;
    }

    public function getOriginId(): ?int
    {
        return $this->origin_id;
    }

    public function setOriginId(int $origin_id): static
    {
        $this->origin_id = $origin_id;

        return $this;
    }

    public function getOriginName(): ?string
    {
        return $this->origin_name;
    }

    public function setOriginName(string $origin_name): static
    {
        $this->origin_name = $origin_name;

        return $this;
    }

    public function getOriginInformation(): ?string
    {
        return $this->origin_information;
    }

    public function setOriginInformation(string $origin_information): static
    {
        $this->origin_information = $origin_information;

        return $this;
    }

    public function getProposedByType(): ?string
    {
        return $this->proposed_by_type;
    }

    public function setProposedByType(string $proposed_by_type): static
    {
        $this->proposed_by_type = $proposed_by_type;

        return $this;
    }

    public function getProposedByFirstName(): ?string
    {
        return $this->proposed_by_first_name;
    }

    public function setProposedByFirstName(string $proposed_by_first_name): static
    {
        $this->proposed_by_first_name = $proposed_by_first_name;

        return $this;
    }

    public function getProposedByLastName(): ?string
    {
        return $this->proposed_by_last_name;
    }

    public function setProposedByLastName(string $proposed_by_last_name): static
    {
        $this->proposed_by_last_name = $proposed_by_last_name;

        return $this;
    }

    public function getExerciseFileId(): ?int
    {
        return $this->exercisie_file_id;
    }

    public function setExerciseFileId(int $exercisie_file_id): static
    {
        $this->exercisie_file_id = $exercisie_file_id;

        return $this;
    }

    public function getCorrectionFileId(): ?int
    {
        return $this->correction_file_id;
    }

    public function setCorrectionFileId(int $correction_file_id): static
    {
        $this->correction_file_id = $correction_file_id;

        return $this;
    }

    public function getCreatedById(): ?int
    {
        return $this->created_by_id;
    }

    public function setCreatedById(int $created_by_id): static
    {
        $this->created_by_id = $created_by_id;

        return $this;
    }
}
