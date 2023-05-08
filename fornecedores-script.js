const empresas = [
    {
      nome: "Royal Canin",
      descricao:
        "Empresa francesa especializada em nutrição para cães e gatos.",
      logo: "https://th.bing.com/th/id/OIP.bRwUCMBaQUPVLzyVOikT0gHaHa?pid=ImgDet&rs=1",
      site: "https://www.royalcanin.com/br",
    },
    {
      nome: "Pedigree",
      descricao:
        "Empresa americana que produz alimentos para cães e oferece suporte a animais de estimação.",
      logo: "https://th.bing.com/th/id/OIP.PcOS_p-XNoPseNgQxqcHRAHaHa?pid=ImgDet&rs=1",
      site: "https://www.pedigree.com.br/",
    },
    {
      nome: "Whiskas",
      descricao:
        "Marca de alimentos para gatos pertencente à empresa Mars, Incorporated.",
      logo: "https://th.bing.com/th/id/R.e5c8d0f824b695371be2abec8dccf5d7?rik=6vN5GGmpWM7URA&pid=ImgRaw&r=0",
      site: "https://www.whiskas.com.br/",
    },
    {
      nome: "Hills",
      descricao:
        "Empresa americana de nutrição animal que produz alimentos para cães e gatos.",
      logo: "https://media.consumeraffairs.com/files/logos/hills-pet-foods_logo_428.jpg",
      site: "https://www.hillsbrasil.com.br/",
    },
    {
      nome: "Purina",
      descricao:
        "Marca da empresa suíça Nestlé que produz alimentos para animais de estimação.",
      logo: "https://th.bing.com/th/id/OIP.hRQ2BbN_IsuCprKvELuzqAAAAA?pid=ImgDet&rs=1",
      site: "https://www.purina.com.br/",
    },
    {
      nome: "Bayer",
      descricao:
        "Empresa alemã que produz uma ampla variedade de produtos para animais, incluindo medicamentos, suplementos e alimentos.",
      logo: "https://www.bayer.com.br/themes/custom/bayer_cpa/logo.svg",
      site: "https://www.bayerpet.com.br/",
    },
    {
      nome: "Petlove",
      descricao:
        "Empresa brasileira especializada em produtos para animais de estimação, incluindo alimentos, acessórios e medicamentos.",
      logo: "https://th.bing.com/th/id/R.9ba04d4771583a63f097ff8a81054703?rik=oFeR6aFHgrl91w&pid=ImgRaw&r=0",
      site: "https://www.petlove.com.br/",
    },
    {
      nome: "Globoaves",
      descricao: "Empresa brasileira que produz alimentos para cães, gatos e aves.",
      logo: "https://globoaves.com.br/wp-content/themes/icone-theme/assets/images/logo.png",
      site: "https://www.globoaves.com.br/",
    },
    {
      nome: "PremieRpet",
      descricao:
        "Empresa brasileira especializada em alimentos super premium para cães e gatos.",
      logo: "https://th.bing.com/th/id/OIP.pnpdSYTdUD-G1Tiyzz5QqAAAAA?pid=ImgDet&rs=1",
      site: "https://www.premierpet.com.br/",
    },
    {
      nome: "Farmina",
      descricao:
        "Empresa italiana de alimentos para cães e gatos que utiliza ingredientes naturais e de alta qualidade.",
      logo: "https://th.bing.com/th/id/R.e5dc6dd888086cd21ad4b607af494e9b?rik=3Vwvl25E%2fgfM4g&riu=http%3a%2f%2fcentrokennels.com%2fwp-content%2fuploads%2f2017%2f03%2fFARMINA-LOGO-PAYOFF-WEB-e1491209270106.png&ehk=jnwE%2bTOQcfc1c6MYKl5bLFSs5%2bm3SwgQqm%2bBeHv4gh4%3d&risl=&pid=ImgRaw&r=0",
      site: "https://www.farmina.com/brasil/",
    },
  ];
  

  const empresasContainer = document.getElementById("empresas-container");

empresas.forEach((empresa) => {
  const div = document.createElement("div");
  div.classList.add("empresa");

  const img = document.createElement("img");
  img.src = empresa.logo;
  img.alt = empresa.nome;

  const h2 = document.createElement("h2");
  h2.textContent = empresa.nome;

  const p = document.createElement("p");
  p.textContent = empresa.descricao;

  const a = document.createElement("a");
  a.href = empresa.site;
  a.textContent = "Site official";

  div.appendChild(img);
  div.appendChild(h2);
  div.appendChild(p);
  div.appendChild(a);

  empresasContainer.appendChild(div);
});