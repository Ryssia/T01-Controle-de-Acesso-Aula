/** Script para modificar papeis e permissoes
 */
 
/** Permitindo acesso aos metodos das classes Role e Permission
 */
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
Buscamos o usuario com ID igual a 2 e atribuimos o papel de admin a ele
 */
$user = User::find(2);
$user->assignRole('admin');


/** Buscamos um papel e atribuimos permissoes a ele
aqui usa-se o first() ao inves do get() porque o ultimo retorna uma collection
e o first() retorna uma instancia do modelo (que e o que queremos)
 */
$roleRevisor = Role::where('name', 'revisor')->first();
//echo($roleRevisor);
$roleRevisor->givePermissionTo('viewNoticia');

/** Podemos "sincronizar" varias permissoes ao mesmo tempo para um papel
 */
$roleEditor = Role::where('name', 'editor')->first();
//echo($roleEditor);
$roleEditor->syncPermissions(['updateNoticia', 'viewNoticia']);