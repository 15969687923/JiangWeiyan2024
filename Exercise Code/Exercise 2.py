import csv
import numpy as np
from typing import Set, Tuple, List
import torch
import torch.utils
import torch.utils.data
import torch.nn as nn
import torchvision

NoneType = type(None)
import matplotlib.pyplot as plt
from IPython.display import display, clear_output
from PIL import Image
import torchvision.transforms.functional as TF
from torchvision.models import vgg11
from torchvision.models import mobilenet_v2
import torchvision.transforms as transforms
import time

def swap(coords: np.ndarray):
    coords[:, [0, 2]], coords[:, [1, 3]] = coords[:, [1, 3]], coords[:, [0, 2]]
    return coords
"""
Firstly, the most obvious error lies in the right side of the assignment statement, 
where coords[:, 1] is mistakenly assigned to both coords[:, 0] and coords[:, 2], 
without properly swapping coords[:, 0] with coords[:, 1] and coords[:, 2] with coords[:, 3]. 
This results in the x and y coordinates not being swapped correctly.

Additionally, the syntax of the assignment statement is incorrect as there is 
an extra comma at the end of the tuple on the right side, which will cause a syntax error.
"""

coords = np.array([[10, 5, 15, 6, 0],
                    [11, 3, 13, 6, 0],
                    [5, 3, 13, 6, 1],
                    [4, 4, 13, 6, 1],
                    [6, 5, 13, 16, 1]])
swapped_coords = swap(coords)
print(swapped_coords)

