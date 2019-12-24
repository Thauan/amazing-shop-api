<?

namespace App\Repositories;

use App\Models\Commodity;

class CommodityRepository implements CommodityRepositoryInterface
{
    public function all()
    {
        return Commodity::all();
    }

    public function findById($id)
    {
        return Commodity::find($id);
    }
}
