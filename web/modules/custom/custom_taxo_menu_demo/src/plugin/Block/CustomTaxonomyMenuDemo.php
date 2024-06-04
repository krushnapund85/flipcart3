<?php
/**
 * @file
 * Contains \Drupal\custom_taxo_menu_demo\Plugin\Block.
 */
namespace Drupal\custom_taxo_menu_demo\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'taxo_menu_demo' block.
 *
 * @Block(
 *   id = "taxo_menu_demo",
 *   admin_label = @Translation("taxo_menu_demo block"),
 *   category = @Translation("Custom taxo_menu_demo block")
 * )
 */
class CustomTaxonomyMenuDemo extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
        $vid = 'category_list';
        $manager = \Drupal::entityTypeManager()->getStorage('taxonomy_term');

// Load the taxonomy tree using values.
$tree = $manager->loadTree(
  $vid, // The taxonomy term vocabulary machine name.
  0,                 // The "tid" of parent using "0" to get all.
  1,                 // Get terms from 1st, 2nd and 3rd levels.
  TRUE               // Get full load of taxonomy term entity.
);
 
$results = [];
           
          $results = [];
          foreach ($tree as $term) {
            $tids[] = $term->id();
          }
          $terms = \Drupal\taxonomy\Entity\Term::loadMultiple($tids);
          foreach ($terms as $term) {
          //dump($term);die;
          $fileUrl = '';
          if (!empty($term->field_category_image->target_id)) {
            $file = \Drupal\file\Entity\File::load($term->field_category_image->target_id); // load File entity object
            $fileUrl = $file->get('uri')->value;
          }
          // foreach($terms as $term=>$value){
          //   $data[$terms[$term]->tid->value] = $terms[$term]->name->value;
          // }
           // get the URL.
           if (!empty($manager->loadParents($term->id()))) {
            $results[] = $term->getName();
          }

          $child_terms = $manager->loadChildren($term->tid->value);
          $child_arr = [];
          if (!empty($child_terms)) {
            foreach($child_terms as $child)
            $child_arr[] = [
              "tid"=> $child->id(),
            "term_name"=>$child->name->value 
            ];
          }
            $data[] = [
                'tid' => $term->tid->value, //return tid of term
             'term_name'=> $term->name->value,
              'img'=> $fileUrl,
              'child' => $child_arr
            ];
        }
        // dump($data);
    return [
      '#theme' => 'custom_texo_menu_demo',
      '#data' => $data
    ];
  }
}
