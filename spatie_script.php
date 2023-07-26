use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


$roleAdmin = Role::create(['name' => 'admin']);
$roleEditor = Role::create(['name' => 'editor']);
$roleRevisor = Role::create(['name' => 'revisor']);

$permissionViewNoticia = Permission::create(['name' => 'viewNoticia']);
$permissionCreateNoticia = Permission::create(['name' => 'createNoticia']);
$permissionUpdateNoticia = Permission::create(['name' => 'updateNoticia']);
$permissionDeleteNoticia = Permission::create(['name' => 'deleteNoticia']);


$permissionViewNoticia->assignRole($roleAdmin);
$permissionCreateNoticia->assignRole($roleAdmin);
$permissionUpdateNoticia->assignRole($roleAdmin);
$permissionDeleteNoticia->assignRole($roleAdmin);

$user = User::find(1);

$user->assignRole('admin');

$user = User::find(2);

$user->assignRole('editor');