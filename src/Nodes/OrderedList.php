<?php

namespace Tiptap\Nodes;

use Tiptap\Core\Node;

class OrderedList extends Node
{
    public static $name = 'orderedList';

    public function parseHTML()
    {
        return [
            [
                'tag' => 'ol',
            ],
        ];
    }

    public static function addAttributes()
    {
        return [
            'order' => [
                'parseHTML' => fn ($DOMNode) => (int) $DOMNode->getAttribute('start') ?: null,
            ],
        ];
    }

    public function renderHTML($node)
    {
        $attrs = [];

        if (isset($node->attrs->order)) {
            $attrs['start'] = $node->attrs->order;
        }

        return [
            'tag' => 'ol',
            'attrs' => $attrs,
        ];
    }
}
