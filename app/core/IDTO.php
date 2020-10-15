<?php

declare(strict_types=1);

namespace LearningCore;

interface IDTO
{
    public function validateFields(): void;
}