<?php 

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\File;

class FileFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file1 = new File();
        $file1->setName('Document 1');
        $file1->setOriginalName('document_1');
        $file1->setExtension('pdf');
        $file1->setSize(1024); 
        $manager->persist($file1);

        $file2 = new File();
        $file2->setName('Document 2');
        $file2->setOriginalName('document_2');
        $file2->setExtension('docx');
        $file2->setSize(2048); 
        $manager->persist($file2);

        $file3 = new File();
        $file3->setName('Image exemple');
        $file3->setOriginalName('example_Image');
        $file3->setExtension('png');
        $file3->setSize(512); 
        $manager->persist($file3);

        $file4 = new File();
        $file4->setName('Presentation');
        $file4->setOriginalName('presentation');
        $file4->setExtension('pptx');
        $file4->setSize(4096); 
        $manager->persist($file4);

        $file5 = new File();
        $file5->setName('Spreadsheet');
        $file5->setOriginalName('spreadsheet');
        $file5->setExtension('xlsx');
        $file5->setSize(8192); 
        $manager->persist($file5);

        $file6 = new File();
        $file6->setName('Vidéo exemple');
        $file6->setOriginalName('example_video');
        $file6->setExtension('mp4');
        $file6->setSize(16384);
        $manager->persist($file6);

        $manager->flush();
    }
}
