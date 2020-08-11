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

        $allproducts = $em->getRepository(Product::class)->findAll();
        return $this->render('home/index.html.twig', [
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
     * @Route("/aboutus", name="aboutuspage")
     */
    public function aboutus(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","propos");

        
        return $this->render('home/aboutus.html.twig', [
            
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

        return $this->render('home/contact.html.twig', [
            "form" => $form->createView()
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

}
