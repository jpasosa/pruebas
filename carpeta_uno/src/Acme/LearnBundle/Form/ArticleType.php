<?php
namespace Acme\LearnBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class ArticleType extends AbstractType
{
  public function buildForm(FormBuilder $builder, array $options) {
    $builder->add('title')
               ->add('author')
               ->add('created')
               ->add('content')
               ->add('tags')
               ->add('slug')
               ->add('updated')
               ->add('created')
               ->add('category')
               ;
  }
    
    public function getName() {
        return 'article_form';
    }

}


