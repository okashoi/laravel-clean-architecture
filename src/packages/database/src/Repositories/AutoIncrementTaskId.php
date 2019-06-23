<?php

namespace MyApp\Database\Repositories;

use MyApp\Components\Tasks\Entities\Id;
use MyApp\Database\{InvalidArgumentException, EntityUnidentifiedException};

/**
 * タスク ID Value Object
 *
 * Class AutoIncrementId
 * @package MyApp\Database\Repositories
 */
final class AutoIncrementTaskId implements Id
{
    /**
     * @var int|null
     */
    private $value;

    /**
     * AutoIncrementId constructor.
     * @param int|null $value
     * @throws InvalidArgumentException 0 以下の整数が与えられた場合
     */
    public function __construct(?int $value)
    {
        if (!is_null($value) && $value < 1) {
            throw new InvalidArgumentException('ID には正の整数を指定してください');
        }

        $this->value = $value;
    }

    /**
     * @param Id $another
     * @return bool
     * @throws EntityUnidentifiedException ID が未確定のとき
     */
    public function equals(Id $another): bool
    {
        $this->ensureIdentified();

        if (!$another instanceof static) {
            return false;
        }

        return $this->value === $another->value();
    }

    /**
     * @throws EntityUnidentifiedException ID が未確定のとき
     */
    private function ensureIdentified(): void
    {
        if (is_null($this->value)) {
            throw new EntityUnidentifiedException();
        }
    }

    /**
     * @return int
     * @throws EntityUnidentifiedException ID が未確定のとき
     */
    public function value(): int
    {
        $this->ensureIdentified();

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }
}
