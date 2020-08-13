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
use App\Entity\Comment;
use App\Form\CommentType;


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

        $comment = new Comment();
        if($session->get("user") != null){
            $name = $session->get("user")->getLastname().' '.$session->get("user")->getFirstname();
            $comment->setName($name);
        }
        $form = $this->createForm(CommentType::class,$comment);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $comment->setCreated(new \DateTime());
                $comment->setProduct($pd);
                $em->persist($comment);
                $em->flush();

                $comment = new Comment();
                $form = $this->createForm(CommentType::class,$comment);
            }
        }

        $others = $em->getRepository(Product::class)->findBy(["category"=>$pd->getCategory()]);
        $comments = $em->getRepository(Comment::class)->findBy(["product"=>$pd],["id"=>"desc"]);
        return $this->render('home/oneproduct.html.twig', [
            "product" => $pd,
            "others" => $others,
            "form" => $form->createView(),
            "comments" => $comments
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
     * @Route("/mon_panier", name="mybasket")
     */
    public function myBasket(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","basket");

        $basket = $session->get("basket");
        $products = [];
        if(isset($basket)){
            foreach($basket as $k=>$v){
                $product = $em->find(Product::class,$k);
                $courant = [$product,$v];
                array_push($products,$courant);
            }
        }
        return $this->render('home/mybasket.html.twig', [
            "products" => $products
        ]);
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

        $comment = new Comment();
        if($session->get("user") != null){
            $name = $session->get("user")->getLastname().' '.$session->get("user")->getFirstname();
            $comment->setName($name);
        }
        $form = $this->createForm(CommentType::class,$comment);
        $comments = $em->getRepository(Comment::class)->findBy(["article"=>$ar],["id"=>"desc"]);
        return $this->render('home/onearticle.html.twig', [
            "article" => $ar,
            "form" => $form->createView(),
            "comments" => $comments
        ]);
    }

     /**
     * @Route("/blog/article/addonecomment/{id}",methods="post")
     */
    public function addOneCommentToArticle(Article $ar ,Request $request){
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $comment = new Comment();
            $form = $this->createForm(CommentType::class,$comment);
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
                if($form->isValid()){
                    $comment->setCreated(new \DateTime());
                    $comment->setArticle($ar);
                    $em->persist($comment);
                    $em->flush();

                    $date = $comment->getCreated()->format("d/m/Y h:i:s");
                    return new Response($date);
                }
            }
        }
        return new Response("0");
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

    /**
     * @Route("/chercherproduits", name="searchproduct")
     */
    public function searchProductsByName(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("nav","searchproduct");

        $name = $request->request->get("productname");
        
        $products = $em->getRepository(Product::class)->findByName($name);
        
        return $this->render('home/searchproduct.html.twig', [
            "name" => $name,
            "products" => $products
        ]);
    }

}
