<?php

namespace App\Model\Table;

use Banana\Model\BaseTable;

/**
 * Class Article
 * Fausse classe servant dans les tests de template
 * @package App\Models\Article
 */
class ArticleTable extends BaseTable
{
    /**
     * Renvoie un titre
     * @return string
     */
    public function getTitle()
    {
        return 'Créer son moteur de templates, c\'est possible !';
    }
}
