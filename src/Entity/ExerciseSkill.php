<?php

namespace App\Entity;

use App\Repository\ExerciseSkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseSkillRepository::class)]
class ExerciseSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $exercise_id = null;

    #[ORM\Column]
    private ?int $skill_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExerciseId(): ?int
    {
        return $this->exercise_id;
    }

    public function setExerciseId(int $exercise_id): static
    {
        $this->exercise_id = $exercise_id;

        return $this;
    }

    public function getSkillId(): ?int
    {
        return $this->skill_id;
    }

    public function setSkillId(int $skill_id): static
    {
        $this->skill_id = $skill_id;

        return $this;
    }
}
