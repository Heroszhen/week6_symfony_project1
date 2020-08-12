<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Entity\Product;
use App\Form\ProductType;
use App\Form\Product2Type;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Entity\Slider;
use App\Form\SliderType;
use App\Entity\Company;
use App\Form\CompanyType;

/**
 * Class AdmincategoryController
 * @package App\Controller\Admin
 *
 * @Route("/admin")
 */
class AdmincategoryController extends AbstractController
{
    /**
     * @Route("/", name="adminallcategories")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","category");

        $ca = new Category();
        $form = $this->createForm(CategoryType::class,$ca);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $file = $ca->getPhoto();
            if (!is_null($file)) {
                $newimg = uniqid() . '.' . $file->guessExtension();
                $file->move($this->getParameter('upload_dir'), $newimg);
                $ca->setphoto($newimg);
            }
            $em->persist($ca);
            $em->flush();

            $ca = new Category();
            $form = $this->createForm(CategoryType::class,$ca);

            $message = "Une catégorie a été créée avec succès";
            $this->addFlash('success', $message);
        }
        $allcategories = $em->getRepository(Category::class)->findBy([],["id"=>"desc"]);

        return $this->render('admin/admincategory/index.html.twig', [
            "allcategories" => $allcategories,
            "form" => $form->createView()
        ]);
    }

     /**
     * @Route("/category/deleteonecategory/{id}", name="admindeleteonecategory")
     */
    public function deleteOneCategory(Category $ca , Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($ca->getPhoto() != null){
            if (file_exists($this->getParameter('upload_dir'). $ca->getPhoto()))unlink($this->getParameter('upload_dir'). $ca->getPhoto());
        }
        $em->remove($ca);
        $em->flush();
        return $this->redirectToRoute('adminallcategories');
    }

    /**
     * @Route("/category/modifier_une_categorie/{id}", name="adminmodifycategory")
     */
    public function modifyOneCategory(Category $ca, Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","category");

        $photo = $ca->getPhoto();

        $form = $this->createForm(CategoryType::class,$ca);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $file = $ca->getPhoto();
            if (!is_null($file)) {
                $newimg = uniqid() . '.' . $file->guessExtension();
                $file->move($this->getParameter('upload_dir') , $newimg);
                $ca->setPhoto($newimg);
                if ($photo != null) unlink($this->getParameter('upload_dir') . $photo);
            }else{
                $ca->setPhoto($photo);
            }
            $em->persist($ca);
            $em->flush();

            $message = "Vos modifications ont été enregistrées avec succès";
            $this->addFlash('success', $message);
        }
        return $this->render('admin/admincategory/modifyonecategory.html.twig', [
            "category" => $ca,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/produit/tous_les_produits", name="adminallproducts")
     */
    public function allProducts(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","product");

        $product = new Product();
        $form = $this->createForm(ProductType::class,$product);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $file = $product->getPhoto();
                if (!is_null($file)) {
                    $newimg = uniqid() . '.' . $file->guessExtension();
                    $file->move($this->getParameter('upload_dir'), $newimg);
                    $product->setphoto($newimg);
                }
                $em->persist($product);
                $em->flush();

                $message = "Un produit a été ajouté avec succès";
                $this->addFlash('success', $message);
            }
        }

        $allproducts = $em->getRepository(Product::class)->findBy([],["id"=>"desc"]);
        return $this->render('admin/admincategory/allproducts.html.twig', [
            "allproducts" => $allproducts,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/product/deleteoneproduct/{id}", name="admindeleteoneproduct")
     */
    public function deleteOneProduct(Product $product , Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($product->getPhoto() != null){
            if (file_exists($this->getParameter('upload_dir'). $product->getPhoto()))unlink($this->getParameter('upload_dir'). $product->getPhoto());
        }
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('adminallproducts');
    }

     /**
     * @Route("/produit/modifier_un_produit/{id}", name="adminmodifyproduct")
     */
    public function modifyOneProduct(Product $product, Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","product");

        $photo = $product->getPhoto();

        $form = $this->createForm(Product2Type::class,$product);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $file = $product->getPhoto();
                if (!is_null($file)) {
                    $newimg = uniqid() . '.' . $file->guessExtension();
                    $file->move($this->getParameter('upload_dir') , $newimg);
                    $product->setPhoto($newimg);
                    if ($photo != null) unlink($this->getParameter('upload_dir') . $photo);
                }else{
                    $product->setPhoto($photo);
                }
                $em->persist($product);
                $em->flush();

                $message = "Vos modifications ont été enregistrées avec succès";
                $this->addFlash('success', $message);
            }
        }

        return $this->render('admin/admincategory/modifyoneproduct.html.twig', [
            "form" => $form->createView(),
            "product" => $product
        ]);
    }

     /**
     * @Route("/article/tous_les_articles", name="adminallarticles")
     */
    public function allArticles(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","article");

        $article = new Article();
        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $file = $article->getPhoto();
                if($file == null){
                    $message = "Veuillez mettre une photo";
                    $this->addFlash('danger', $message);
                }else{
                    $newimg = uniqid() . '.' . $file->guessExtension();
                    $file->move($this->getParameter('upload_dir'), $newimg);
                    $article->setphoto($newimg);

                    $article->setCreated(new \DateTime());

                    $em->persist($article);
                    $em->flush();

                    $message = "Votre article a été créé avec succès";
                    $this->addFlash('success', $message);

                    $article = new Article();
                    $form = $this->createForm(ArticleType::class,$article);
                }
            }
        }

        $allarticles = $em->getRepository(Article::class)->findBy([],["id"=>"desc"]);
        return $this->render('admin/admincategory/allarticles.html.twig', [
            "form" => $form->createView(),
            "allarticles" => $allarticles
        ]);
    }

    /**
     * @Route("/article/deleteonearticle/{id}", name="admindeleteonearticle")
     */
    public function deleteOnearticle(article $article , Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if($article->getPhoto() != null){
            if (file_exists($this->getParameter('upload_dir'). $article->getPhoto()))unlink($this->getParameter('upload_dir'). $article->getPhoto());
        }
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('adminallarticles');
    }

     /**
     * @Route("/article/modifier_un_article/{id}", name="adminmodifyonearticle")
     */
    public function modifyOneArticle(Article $article , Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","article");

        $photo = $article->getPhoto();

        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $file = $article->getPhoto();
                if (!is_null($file)) {
                    $newimg = uniqid() . '.' . $file->guessExtension();
                    $file->move($this->getParameter('upload_dir') , $newimg);
                    $article->setPhoto($newimg);
                    if ($photo != null) unlink($this->getParameter('upload_dir') . $photo);
                }else{
                    $article->setPhoto($photo);
                }
                $em->persist($article);
                $em->flush();

                $message = "Vos modifications ont été enregistrées avec succès";
                $this->addFlash('success', $message);
            }
        }

        return $this->render('admin/admincategory/modifyonearticle.html.twig', [
            "article" => $article,
            "form" => $form->createView()
        ]);
    }

     /**
     * @Route("/slider/toutes_les_photos", name="adminslider")
     */
    public function allPhotosOfSlider(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","slider");

        $slider = new Slider();
        $form = $this->createForm(SliderType::class,$slider);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $em->persist($slider);
                $em->flush();

                $message = "La photo a été ajoutée avec succès";
                $this->addFlash('success', $message);

                $slider = new Slider();
                $form = $this->createForm(SliderType::class,$slider);
            }
        }

        $photos = $em->getRepository(Slider::class)->findAll();

        return $this->render('admin/admincategory/slider.html.twig', [
            "photos" => $photos,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/slider/deleteoneslider/{id}", name="admindeleteoneslider")
     */
    public function deleteOneSlider(Slider $slider , Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($slider);
        $em->flush();
        return $this->redirectToRoute('adminslider');
    }

    /**
     * @Route("/company", name="admincompany")
     */
    public function company(Request $request){
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $session->set("adminnav","company");

        $company = $em->find(Company::class,1);
        if(empty((array)$company))$company = new Company();
        $form = $this->createForm(CompanyType::class,$company);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if($form->isValid()){
                $em->persist($company);
                $em->flush();

                $message = "Vos modifications ont été enregistrées avec succès";
                $this->addFlash('success', $message);
            }
        }

        return $this->render('admin/admincategory/company.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
}
