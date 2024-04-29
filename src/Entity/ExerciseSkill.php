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

    #[ORM\ManyToOne(targetEntity: Exercise::class, inversedBy: 'exerciceSkills')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exercise $exercise = null;


    #[ORM\ManyToOne(targetEntity: Skill::class, inversedBy: 'exerciceSkills')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Skill $skill = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExerciseId(): ?Exercise
    {
        return $this->exercise;
    }

    public function setExerciseId(Exercise $exercise): static
    {
        $this->exercise = $exercise;

        return $this;
    }

    public function getSkillId(): ?Skill
    {
        return $this->skill;
    }

    public function setSkillId(Skill $skill): static
    {
        $this->skill = $skill;

        return $this;
    }
}
