<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\ArrayNotation\WhitespaceAfterCommaInArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\TrailingCommaInMultilineArrayFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\Comment\MultilineCommentOpeningClosingFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\TernaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocIndentFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Semicolon\SpaceAfterSemicolonFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\CompactNullableTypehintFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesAroundOffsetFixer;
use PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer;
use PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer;
use SlevomatCodingStandard\Sniffs\Classes\UnusedPrivateElementsSniff;
use SlevomatCodingStandard\Sniffs\Variables\UselessVariableSniff;
use SlevomatCodingStandard\Sniffs\Classes\ModernClassNameReferenceSniff;
use SlevomatCodingStandard\Sniffs\Operators\DisallowEqualOperatorsSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\UseDoesNotStartWithBackslashSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\UselessAliasSniff;

return static function (ContainerConfigurator $containerConfigurator): void {
    // Config
    $parameters = $containerConfigurator->parameters();
    $parameters->set(
        Option::SKIP,
        [
            // Excluded paths
            __DIR__ . '/vendor/*',
            __DIR__ . '*/cache/*',
            __DIR__ . 'config/*',
            __DIR__ . 'storage/*',

            // Unwanted rules
            ReturnAssignmentFixer::class,
            UnusedPrivateElementsSniff::class.'.UnusedMethod',
            UselessVariableSniff::class.'.UselessVariable',
        ],
    );

    // Rule sets
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SETS, [ SetList::PSR_12 ]);

    // Individual rules
    $services = $containerConfigurator->services();
    $services->set(ArraySyntaxFixer::class)
        ->call('configure', [[ 'syntax' => 'short' ]]);
    $services->set(CastSpacesFixer::class)
        ->call('configure', [[ 'space' => 'none' ]]);
    $services->set(ReturnTypeDeclarationFixer::class)
        ->call('configure', [[ 'space_before' => 'none' ]]);
    $services->set(ConcatSpaceFixer::class)
        ->call('configure', [[ 'spacing' => 'none' ]]);
    $services->set(WhitespaceAfterCommaInArrayFixer::class);
    $services->set(NoWhitespaceBeforeCommaInArrayFixer::class);
    $services->set(TrailingCommaInMultilineArrayFixer::class);
    $services->set(MultilineCommentOpeningClosingFixer::class);
    $services->set(FunctionTypehintSpaceFixer::class);
    $services->set(BinaryOperatorSpacesFixer::class);
    $services->set(ObjectOperatorWithoutWhitespaceFixer::class);
    $services->set(TernaryOperatorSpacesFixer::class);
    $services->set(UnaryOperatorSpacesFixer::class);
    $services->set(NoEmptyPhpdocFixer::class);
    $services->set(PhpdocIndentFixer::class);
    $services->set(NoSinglelineWhitespaceBeforeSemicolonsFixer::class);
    $services->set(SemicolonAfterInstructionFixer::class);
    $services->set(SpaceAfterSemicolonFixer::class);
    $services->set(ArrayIndentationFixer::class);
    $services->set(CompactNullableTypehintFixer::class);
    $services->set(MethodChainingIndentationFixer::class);
    $services->set(NoSpacesAroundOffsetFixer::class);
    $services->set(NoWhitespaceInBlankLineFixer::class);
    $services->set(ModernClassNameReferenceSniff::class);
    $services->set(DisallowEqualOperatorsSniff::class);
    $services->set(UseDoesNotStartWithBackslashSniff::class);
    $services->set(UselessAliasSniff::class);
};
