
namespace App\Model\Entity;

use Banana\Entity\BaseEntity;

class {{ modelEntityName }} extends BaseEntity
{

	public $fieldNames = <?=var_export($fieldNames)?>;

}

