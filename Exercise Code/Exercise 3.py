import csv
import numpy as np
from typing import Set,Tuple, List
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


def plot_data(csv_file_path: str):
    # load data
    results = []
    with open(csv_file_path) as result_csv:
        csv_reader = csv.reader(result_csv, delimiter=',')
        next(csv_reader)  # Skip header
        for row in csv_reader:
            results.append(row)
    results = np.array(results, dtype=float)  # Convert to numpy array and ensure float type

    # plot precision-recall curve
    plt.plot(results[:, 0], results[:, 1], marker='o')  # Add markers for clarity
    plt.ylim([-0.05, 1.05])
    plt.xlim([-0.05, 1.05])
    plt.xlabel('Recall')
    plt.ylabel('Precision')
    plt.grid(True)  # Optionally add grid for better readability
    plt.show()


# Generate CSV file (if it doesn't exist already)
with open("data_file.csv", "w", newline='') as f:  # Add newline='' for compatibility with Python 3
    w = csv.writer(f)
    w.writerow(["precision", "recall"])
    w.writerows([[0.013, 0.951],
                 [0.376, 0.851],
                 [0.441, 0.839],
                 [0.570, 0.758],
                 [0.635, 0.674],
                 [0.721, 0.604],
                 [0.837, 0.531],
                 [0.860, 0.453],
                 [0.962, 0.348],
                 [0.982, 0.273],
                 [1.0, 0.0]])

"""
The main error in the previous program was due to the attempt to use np.stack(results) to stack the data when reading from the CSV file. 
However, since results was already a two-dimensional list (list of lists), 
it was more appropriate to use np.array(results) directly, 
as there was no need to stack them as they were already in a two-dimensional format.
"""

# Plot the data
plot_data('data_file.csv')