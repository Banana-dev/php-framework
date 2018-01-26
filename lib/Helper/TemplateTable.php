namespace App\Model\Table;

use Banana\Model\BaseTable;

class {{ modelTableName }} extends BaseTable
{
	function __construct()
	{
		$this->tableName = "{{tableName}}";
		$this->entityName = "{{entityName}}";
	}
}
