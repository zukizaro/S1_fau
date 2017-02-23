<?php

namespace Sample\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model {

    protected $table = 'sample';
    public $timestamps = false;
    protected $fillable = [
        'sample_id',
        'sample_id_parent',
        'sample_title',
        'sample_overview',
        'sample_description', 
        'sample_images',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'sample_id';

    public function get_list($params = array()) {
        
        $eloquent = self::orderBy('sample.sample_id', 'DESC');
 
        $sample = $eloquent->paginate(5);

        return $sample;
    }

    /**
     *
     * @param type $input
     * @param type $sample_id
     * @return type
     */
    public function update_sample($input, $sample_id = NULL) {

        if (empty($sample_id)) {
            $sample_id = $input['sample_id'];
        }

        $sample = self::find($sample_id);
        if (!empty($sample)) {

            $sample->sample_category = $input['sample_category'];
            $sample->sample_title = $input['sample_title'];
            $sample->sample_overview = $input['sample_overview'];
            $sample->sample_description = $input['sample_description'];
            $sample->updated_at = Date('Y-m-d');

            $sample->save();

            return $sample;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_sample($input) {
        $sample = self::create([
                    'sample_category' => $input['sample_category'],
                    'sample_title' => $input['sample_title'],
                    'sample_overview' => $input['sample_overview'],
                    'sample_description' => $input['sample_description'],
                    'created_at' => Date('Y-m-d'),
                    'updated_at' => Date('Y-m-d'),
        ]);
        return $sample;
    }

}
