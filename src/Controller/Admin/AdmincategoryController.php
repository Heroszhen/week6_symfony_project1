<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Entity\Product;
use App\Form\ProductType;

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

        return $this->render('admin/admincategory/modifyoneproduct.html.twig', [
            
        ]);
    }
}
