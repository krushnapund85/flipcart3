<?php
/**
 * @file
 * Contains \Drupal\custom_taxo_menu\Plugin\Block.
 */
namespace Drupal\custom_taxo_menu\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'taxo_menu' block.
 *
 * @Block(
 *   id = "taxo_menu",
 *   admin_label = @Translation("taxo_menu block"),
 *   category = @Translation("Custom taxo_menu block")
 * )
 */
class CustomTaxonomyMenu extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
        $vid = 'category_list';
        $tree = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree(
            'category_list', // The taxonomy term vocabulary machine name.
            0,                 // The "tid" of parent using "0" to get all.
            1,                 // Get only 1st level.
            TRUE               // Get full load of taxonomy term entity.
          );
           
          $results = [];
           
          foreach ($tree as $term) {
            $tids[] = $term->id();
          }
          $terms = \Drupal\taxonomy\Entity\Term::loadMultiple($tids);
          foreach ($terms as $term) {
          //  dump($term);die;
          $file = \Drupal\file\Entity\File::load($term->field_category_image->target_id); // load File entity object
      
           // get the URL.
            $data[] = [
                'tid' => $term->tid->value, //return tid of term
             'term_name'=> $term->name->value,
              'img'=> $file->get('uri')->value,
            ]; 
        }
      
    return [
      '#theme' => 'custom_texo_menu',
      '#data' => $data
    ];
  }
}