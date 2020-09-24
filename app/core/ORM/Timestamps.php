<?php

declare(strict_types=1);

namespace LearningCore\ORM;

trait Timestamps
{
    /**
     * @Column(type="datetime", name="created_at")
     */
    protected \DateTime $createdAt;

    /**
     * @Column(type="datetime", name="updated_at")
     */
    protected \DateTime $updatedAt;

    /**
     * @PrePersist()
     */
    public function createdAt()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @PreUpdate()
     */
    public function updateAt()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Timestamps
     */
    public function setCreatedAt(\DateTime $createdAt): Timestamps
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Timestamps
     */
    public function setUpdatedAt(\DateTime $updatedAt): Timestamps
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
