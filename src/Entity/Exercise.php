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
    private $id;

     #[ORM\ManyToOne(targetEntity: Thematic::class, inversedBy: 'exercices')]
     #[ORM\JoinColumn(nullable: false)]
     private ?Thematic $thematic = null;

     #[ORM\ManyToOne(targetEntity: Classroom::class, inversedBy: 'exercices')]
     #[ORM\JoinColumn(nullable: false)]
     private ?Classroom $classroom = null;

     #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'exercices')]
     #[ORM\JoinColumn(nullable: false)]
     private ?Course $course = null;

     #[ORM\ManyToOne(targetEntity: Origin::class, inversedBy: 'exercices')]
     #[ORM\JoinColumn(nullable: false)]
     private ?Origin $origin = null;

     #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'exercices')]
     #[ORM\JoinColumn(nullable: false)]
     private ?User $createdBy = null;

     #[ORM\ManyToOne(targetEntity: File::class, inversedBy: 'exercices')]
     #[ORM\JoinColumn(nullable: false)]
     private ?File $exerciseFile = null;

     #[ORM\ManyToOne(targetEntity: Thematic::class, inversedBy: 'exercices')]
     #[ORM\JoinColumn(nullable: false)]
     private ?Thematic $correctionFile = null;

     #[ORM\Column(length: 255)]
     private ?string $name  = null; 

    #[ORM\Column(length: 255)]
    private ?string $chapter  = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $keyword = null;

    #[ORM\Column]
    private ?int $difficulty  = null;

    #[ORM\Column(type: Types::FLOAT)]
    private ?float $duration  = null;

    #[ORM\Column(length: 255)]
    private ?string $originName  = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $originInformation  = null;

    #[ORM\Column(length: 255)]
    private ?string $proposedByType  = null; 

    #[ORM\Column(length: 255)]
    private ?string $proposedByFirstName  = null;

    #[ORM\Column(length: 255)]
    private ?string $proposedByLastName  = null;

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
        return $this->course;
    }

    public function setCourseId(int $course): static
    {
        $this->course = $course;

        return $this;
    }

    public function getClassroomId(): ?int
    {
        return $this->classroom;
    }

    public function setClassroomId(int $classroom): static
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getThematicId(): ?int
    {
        return $this->thematic;
    }

    public function setThematicId(int $thematic): static
    {
        $this->thematic = $thematic;

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
        return $this->duration;
    }

    public function setDuration(float $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getOriginId(): ?int
    {
        return $this->origin;
    }

    public function setOriginId(int $origin): static
    {
        $this->origin = $origin;

        return $this;
    }

    public function getOriginName(): ?string
    {
        return $this->originName;
    }

    public function setOriginName(string $origin_name): static
    {
        $this->originName = $origin_name;

        return $this;
    }

    public function getOriginInformation(): ?string
    {
        return $this->originInformation;
    }

    public function setOriginInformation(string $origin_information): static
    {
        $this->originInformation = $origin_information;

        return $this;
    }

    public function getProposedByType(): ?string
    {
        return $this->proposedByType;
    }

    public function setProposedByType(string $proposed_by_type): static
    {
        $this->proposedByType = $proposed_by_type;

        return $this;
    }

    public function getProposedByFirstName(): ?string
    {
        return $this->proposedByFirstName;
    }

    public function setProposedByFirstName(string $proposed_by_first_name): static
    {
        $this->proposedByFirstName = $proposed_by_first_name;

        return $this;
    }

    public function getProposedByLastName(): ?string
    {
        return $this->proposedByLastName;
    }

    public function setProposedByLastName(string $proposed_by_last_name): static
    {
        $this->proposedByLastName = $proposed_by_last_name;

        return $this;
    }

    public function getExerciseFileId(): ?int
    {
        return $this->exerciseFile;
    }

    public function setExerciseFileId(int $exercise_file_id): static
    {
        $this->exerciseFile = $exercise_file_id;

        return $this;
    }

    public function getCorrectionFileId(): ?int
    {
        return $this->correctionFile;
    }

    public function setCorrectionFileId(int $correction_file_id): static
    {
        $this->correctionFile = $correction_file_id;

        return $this;
    }

    public function getCreatedById(): ?int
    {
        return $this->createdBy;
    }

    public function setCreatedById(int $created_by_id): static
    {
        $this->createdBy = $created_by_id;

        return $this;
    }
}
