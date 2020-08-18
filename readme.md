
## Image-resizer

Biblioteka naudoja ImageMagick php pletinį, kuris turi būti įkompiliuotas į php binarinį failą
arba turi būti užkrautas dinamiškai runtime metu. Visos manipuliacijos su nuotraukomis atliekamos
standartinėmis php funckijomis. Jokių išorinių bibliotekų nenaudoja. 

## Veikimo principas

Biblioteka skirta sumažinti nuotraukų užimamą dydį. Construktorius priima vienintelį parametrą, kelią
iki nuotraukos. Norimi nuotraukos parametrai konfiguruojami per funkcijas. Nustatome norimą ilgį, plotį,
kelią kuriame norime išsaugoti nuotrauką ir viskas. 

## Naudojimas

Pagrindinis bibliotekos pritaikymas blade arba twig failuose. Pirma sykį paleidus biblioteką bus patikrinta
, gal jau yra sugeneruota norimų išmatavimų nuotrauką. Jeigu taip, tai bus gražintas kelias iki nuotraukos ir
kokie papildomi skaičiavimai ar manipuliavimai su nuotrauka atlikti nebus. Standartiškai nuotrauka saugoma
storage/thumbnail/ kataloge.


## Instaliacija

Biblioteka instaliuojama composer pagalba

```
composer require vampyrian/image-resizer
```

## Statinis bibliotekos naudojimas

```php
$path = ImageResizer::load($pathToImage)->setWidth(100)->setHeight(100)->saveAndReturnPath();
$path = ImageResizer::load($pathToImage)->setWidthAndHeight(100, 100)->saveAndReturnPath();
$path = ImageResizer::load($pathToImage)->setWidthAndHeight(100, 100)->dirToSave('thumb')->saveAndReturnPath();
```



