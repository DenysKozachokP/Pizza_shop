<?php declare(strict_types = 1);

namespace PHPStan\PhpDocParser\Ast\Type;

use PHPStan\PhpDocParser\Ast\NodeAttributes;
use function sprintf;

class ConditionalTypeNode implements TypeNode
{

	use NodeAttributes;

	public TypeNode $subjectType;

	public TypeNode $targetType;

	public TypeNode $if;

	public TypeNode $else;

	public bool $negated;

	public function __construct(TypeNode $subjectType, TypeNode $targetType, TypeNode $if, TypeNode $else, bool $negated)
	{
		$this->subjectType = $subjectType;
		$this->targetType = $targetType;
		$this->if = $if;
		$this->else = $else;
		$this->negated = $negated;
	}

	public function __toString(): string
	{
		return sprintf(
			'(%s %s %s ? %s : %s)',
			$this->subjectType,
			$this->negated ? 'is not' : 'is',
			$this->targetType,
			$this->if,
			$this->else,
		);
	}

}
