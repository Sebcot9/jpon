<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Form;

use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileFormType extends BaseType
{ 
      public function buildUserForm(FormBuilder $builder, array $options)
      {        
      parent::buildUserForm($builder, $options);

          // custom field       
          $builder->add('profile',new MyProfileFormType(),array(
                    'label' => 'PROFILE'
                    ));

      }

      public function getName()
      {
          return 'vn_user_profile';
      }
}
