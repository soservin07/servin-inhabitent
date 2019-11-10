<?php

namespace GFExcel\Field;

use GF_Field;
use GFExcel\Transformer\Transformer;
use GFExcel\Values\BaseValue;

/**
 * A Field for the Transformer for `repeater` fields.
 * @since 1.7.0
 */
class RepeaterField extends SeparableField
{
    /**
     * A Transformer instance.
     * @since 1.7.0
     * @var Transformer
     */
    private $transformer;

    /**
     * The GF_Field instance for the Repeater
     * @since 1.7.0
     * @var \GF_Field_Repeater
     */
    protected $field;

    /**
     * {@inheritdoc}
     * @since 1.7.0
     */
    public function __construct(GF_Field $field)
    {
        parent::__construct($field);
        $this->transformer = new Transformer();
    }

    /**
     * {@inheritdoc}
     * Maps all subfields `getColumns` calls to the repeater subfields.
     * @since 1.7.0
     */
    public function getColumns()
    {
        return array_values(array_reduce($this->field->fields, function (array $columns, \GF_Field $field) {
            return array_merge($columns, $this->transformer->transform($field)->getColumns());
        }, []));
    }

    /**
     * {@inheritdoc}
     * Maps all subfields `getCells` calls to the repeater subfields with an ammended $entry.
     * @since 1.7.0
     */
    public function getCells($entry)
    {
        // get repeater entries.
        $entries = $entry[$this->field->id];

        // Get the correct field values for every row.
        $rows = array_reduce($entries, function (array $rows, array $entry) {
            $row = [];
            foreach ($this->field->fields as $field) {
                $row[] = array_map(function (BaseValue $cell) {
                    return $cell->getValue();
                }, $this->transformer->transform($field)->getCells($entry));
            }
            $rows[] = call_user_func_array('array_merge', $row);
            return $rows;
        }, []);

        //flip the array
        $result = [];
        foreach ($rows as $row) {
            foreach ($row as $key => $value) {
                $result[$key][] = $value;
            }
        }

        // implode the values into a new string
        $cells = array_map(function (array $values) {
            return implode(
                gf_apply_filters([
                    'gfexcel_field_repeater_implode',
                    $this->field->formId,
                    $this->field->id,
                ], "\n---\n"),
                $values
            );
        }, $result);

        // re-wrap values into cells.
        return $this->wrap($cells);
    }
}
