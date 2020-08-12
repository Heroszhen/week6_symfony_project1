<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\Article;
use App\Entity\Slider;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Form\LoginType;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","home");

        $sliders = $em->getRepository(Slider::class)->findAll();
        $allproducts = $em->getRepository(Product::class)->findAll();
        return $this->render('home/index.html.twig', [
            "sliders"=>$sliders,
            "allproducts" => $allproducts
        ]);
    }

    /**
     * @Route("/categories", name="categoriespage")
     */
    public function categories(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","categories");

        $allcategories = $em->getRepository(Category::class)->findAll();

        return $this->render('home/categories.html.twig', [
            "allcategories" => $allcategories
        ]);
    }

     /**
     * @Route("/category/{id}", name="onecategorypage")
     */
    public function oneCategory(Category $ca,Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","categories");

        $products = $em->getRepository(Product::class)->findBy(["category"=>$ca]);

        return $this->render('home/onecategory.html.twig', [
            "products" => $products,
            "category" => $ca
        ]);
    }

    /**
     * @Route("/product/{id}", name="oneproductpage")
     */
    public function oneproduct(Product $pd , Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","categories");

        $others = $em->getRepository(Product::class)->findBy(["category"=>$pd->getCategory()]);
        return $this->render('home/oneproduct.html.twig', [
            "product" => $pd,
            "others" => $others
        ]);
    }

    /**
     * @Route("/addproductinbasket/{id}")
     */
    public function addOnProductInBasket($id,Request $request){
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $session = $request->getSession();
            $basket = $session->get("basket");
            if($basket == null){
                $basket = [
                    $id=>1
                ];
            }else{
                if(!isset($basket[$id]))$basket[$id] = 1;
                else $basket[$id] += 1;
            }
            $session->set("basket",$basket);
            return new Response('1');
        }
    }

    /**
     * @Route("/aboutus", name="aboutuspage")
     */
    public function aboutus(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","propos");

        $about = $em->find(Company::class,1);
        
        return $this->render('home/aboutus.html.twig', [
            "about" => $about
        ]);
    }

    /**
     * @Route("/contact", name="contactpage")
     */
    public function contact(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","contact");

        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);

        $company = $em->getRepository(Company::class)->findAll();
        return $this->render('home/contact.html.twig', [
            "form" => $form->createView(),
            "company" => $company[0]
        ]);
    }

    /**
     * @Route("/blog", name="blogpage")
     */
    public function blog(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","blog");

        $allarticles = $em->getRepository(Article::class)->findAll();

        return $this->render('home/blog.html.twig', [
            "allarticles" => $allarticles
        ]);
    }

    /**
     * @Route("/blog/article/{id}", name="onearticlepage")
     */
    public function onearticle(Article $ar, Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","blog");

        
        return $this->render('home/onearticle.html.twig', [
            "article" => $ar
        ]);
    }

    /**
     * @Route("/login", name="loginpage")
     */
    public function login(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","login");

        $login = new User();
        $form = $this->createForm(LoginType::class,$login);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $user = $em->getRepository(User::class)->findOneBy(["email"=>$login->getEmail()]);
                if(!empty((array)$user)){
                    if (password_verify($login->getPassword(),$user->getPassword())){
                        $session->set("user",$user);
                        return $this->redirectToRoute('homepage');
                    }
                }
                $message = "L'email ou le mot de passe est incorrect";
                $this->addFlash('danger', $message);
            }
        }

        return $this->render('home/login.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/logout", name="logoutpage")
     */
    public function logout(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","logout");

        $session->remove("user");
        
        return $this->redirectToRoute('homepage');
    }
}
