<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class UserType extends AbstractType
{private $authorization;
    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorization = $authorizationChecker;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username');
if ($this->authorization->isGranted('ROLE_ADMIN')) {
    $builder->add('roles', ChoiceType::class, [
                 "choices" => [
                     "Administrateur" => "ROLE_ADMIN",
                     "Client"         => "ROLE_CLIENT",
                     "Modérateur"     => "ROLE_MODO"
                 ],
                 "multiple"  => true,
                 "expanded"  => true,
                 "label"     => "Accréditation"
             ]);
}
$builder->add('password',PasswordType::class,[

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

}
