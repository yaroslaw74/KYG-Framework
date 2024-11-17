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

use App\Modules\Users\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationFormType extends AbstractType
{
    public function __construct(private TranslatorInterface $translator)
    {
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control'],
                'label' => $this->translator->trans('Username', [], 'users'),
                'label_attr' => ['class' => 'form-label'],
                'constraints' => [
                    new IsTrue([
                        'message' => $this->translator->trans('Please enter your username!', [], 'users'),
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input'],
                'label' => $this->translator->trans('Agree terms', [], 'users'),
                'label_attr' => ['class' => 'form-check-label'],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => $this->translator->trans('You should agree to our terms.', [], 'users'),
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'required' => true,
                'attr' => ['class' => 'form-control', 'autocomplete' => 'new-password'],
                'label' => $this->translator->trans('Password', [], 'users'),
                'label_attr' => ['class' => 'form-label'],
                'toggle' => true,
                'hidden_label' => 'Hide password',
                'visible_label' => 'Show password',
                'toggle_translation_domain' => 'users',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Please enter your password!', [], 'users'),
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => $this->translator->trans('Your password should be at least {{ limit }} characters', [], 'Users'),
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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