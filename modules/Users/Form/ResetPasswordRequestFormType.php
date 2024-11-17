<?php
/**********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2027 Kataev Yaroslav Georgievich
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE.md
 *********************************************************************************/
namespace App\Modules\Users\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatorInterface;

class ResetPasswordRequestFormType extends AbstractType
{
    public function __construct(private TranslatorInterface $translator)
    {
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control', 'autocomplete' => 'email'],
                'label' => $this->translator->trans('Email', [], 'users'),
                'label_attr' => ['class' => 'form-label'],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Please enter your email', [], 'users'),
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}